<?php
    // Configuration file for Portflowio
    $website_name = "Portflowio Example"; // Website's name
    $website_description = "There's a nice website"; // Website's description
    $website_theme = "default"; // Website's theme
    $website_icon = "assets/icon.png"; // Favicon location

    // Configuration for database
    $database_host = "localhost"; // Database's host
    $database_name = "portflowio"; // Database's name
    $database_user = "root"; // User name for MySQL
    $database_password = ""; // Password for MySQL
    $database_table = "content"; // Portflowio table

    $database = new PDO('mysql:host=' . $database_host . ';dbname=' . $database_name . ';charset=utf8', $database_user, $database_password);

    // Admin panel configuration
    $admin_email = "admin@portflowio.ectw.fr"; // Your e-mail for login ("admin@portflowio.ectw.fr" as default)
    $admin_password = "d033e22ae348aeb5660fc2140aec35850c4da997"; // sha1 hash for admin password (generate hash at http://www.sha1-online.com/) ("admin" is default)

    // Theme specific settings
?>
