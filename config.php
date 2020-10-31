<?php
    // Configuration file for Portflowio
    $website_name = "Exemple Portflowio"; // Nom du site
    $website_description = "Ce site est incroyable !"; // Description du site
    $website_theme = "default"; // Theme
    $website_icon = "assets/icon.png"; // Lieu du Favicon

    // Configuration for database
    $database_host = "localhost"; // Host de la base de donnée
    $database_name = "portflowio"; // Nom de la base de donnée
    $database_user = "root"; // Nom d'utilisateur MySQL
    $database_password = ""; // Mot de passe MySQL
    $database_table = "content"; // Table

    $database = new PDO('mysql:host=' . $database_host . ';dbname=' . $database_name . ';charset=utf8', $database_user, $database_password);

    // Admin panel configuration
    $admin_email = "admin@portflowio.ectw.fr"; // Votre email de connexion ("admin@portflowio.ectw.fr" as default)
    $admin_password = "d033e22ae348aeb5660fc2140aec35850c4da997"; // sha1 hash pour le mot de passe administrateur (Ici : http://www.sha1-online.com/) ("admin" par défaut !)

    // Paramètres du theme
?>
