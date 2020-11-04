<?php

    session_start();
    include '../config.php';
    require "../boot.php";

    if($_SESSION["loggedIn"] == true) {
        $login = 1;
        $database->exec('SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
        START TRANSACTION;
        SET time_zone = "+00:00";
        
        DROP TABLE IF EXISTS `content`;
        CREATE TABLE IF NOT EXISTS `content` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `title` varchar(255) NOT NULL,
        `description` varchar(255) NOT NULL,
        `link` varchar(255) NOT NULL,
        `btnname` varchar(255) NOT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;');

        header("Location: panel.php");
    }
    else {
        header("Location: login.php");
    }
?> 
