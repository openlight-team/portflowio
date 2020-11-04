<?php
    if (!include "config.php") {
        header("Location: admin/install.php");
    }
    require "boot.php";
    $select_content = $database->query("SELECT * FROM " . $database_table);
    include 'themes/' . $website_theme . '.php';
?>