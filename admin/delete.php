<?php
    session_start();
    include '../config.php';

    if ($_SESSION["loggedIn"] == true) {
        $login = 1;
    }
    else {
        header("Location: login.php");
    }

    $database->exec("DELETE FROM " . $database_table . " WHERE id = '" . $_GET['id'] . "'");
    header("Location: manage.php");
?>