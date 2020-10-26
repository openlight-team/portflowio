<?php
    // Configuration file for Portflowio
    $website_name = "Portflowio Example"; // Website's name
    $website_description = "There's a nice website"; // Website's description
    $website_theme = "default"; // Website's theme
    $website_icon = "icon.png"; // Favicon location

    // Configuration de la base de données
    $database_host = "localhost"; // Database's host
    $database_name = "portflowio"; // Database's name
    $database_user = "root"; // User name for MySQL
    $database_password = ""; // Password for MySQL
    $database_table = "content"; // Portflowio table

    $database = new PDO('mysql:host=' . $database_host . ';dbname=' . $database_name . ';charset=utf8', $database_user, $database_password);
?>