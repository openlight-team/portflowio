<?php
    // Configuration file for Portfowlio
    $website_name = "Portfowlio Example"; // Website's name
    $website_description = "There's a nice website"; // Website's description

    // Configuration de la base de données
    $database_host = "localhost"; // Database's host
    $database_name = "portfowlio"; // Database's name
    $database_user = "root"; // User name for MySQL
    $database_password = ""; // Password for MySQL

    $database = new PDO('mysql:host=' . $database_host . ';dbname=' . $database_name . ';charset=utf8', $database_user, $database_password);
?>