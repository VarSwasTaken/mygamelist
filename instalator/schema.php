<?php
    session_start();
    $prefix = $_SESSION['prefix'];

$create[] .= "CREATE TABLE IF NOT EXISTS `users` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `username` tinytext,
    `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `admin` tinyint(1) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `id` (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;";

$create[] = "CREATE TABLE IF NOT EXISTS `usergames` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `userID` int unsigned NOT NULL,
    `gameID` int unsigned DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `id` (`id`),
    KEY `FK__users` (`userID`),
    CONSTRAINT `FK__users` FOREIGN KEY (`userID`) REFERENCES `users` (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;";

?>
