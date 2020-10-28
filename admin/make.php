<?php
    session_start();
    include '../config.php';

    if($_SESSION["loggedIn"] == true) {
        $login = 1;
        $database->exec('
        START TRANSACTION;
        
        DROP TABLE IF EXISTS `content`;
        CREATE TABLE IF NOT EXISTS `content` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `title` varchar(255) NOT NULL,
        `description` varchar(255) NOT NULL,
        `link` varchar(255) NOT NULL,
        `btnname` varchar(255) NOT NULL,
        PRIMARY KEY (`id`)
        ) AUTO_INCREMENT=0 DEFAULT CHARSET=utf8_general_ci;');
        
        header("Location: panel.php");
    }
    else {
        header("Location: login.php");
    }
?>