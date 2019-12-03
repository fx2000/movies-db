CREATE DATABASE moviesdb;

use moviesdb;

CREATE TABLE `movies` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  `title` varchar(255),
  `year` int(4),
  `createdAt` datetime NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
);
