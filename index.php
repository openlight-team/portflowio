<?php
    include 'config.php';
    $select_content = $database->query("SELECT * FROM " . $database_table);
    include 'themes/' . $website_theme . '.php';
?>