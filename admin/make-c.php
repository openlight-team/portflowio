<?php
    session_start();
    include '../config.php';

    if(sha1($_SESSION["loggedIn"]) == true) {
        $loggedIn = true;
    }
    else {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Portflowio Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="panel.css">
    </head>
    <body>
        <div id="page">
            <h2>Are you sure ?</h2>
            <p>If the table already exists, all the content will be overwritten.</p>
            <br>
            <a href="make.php"><button type="button" class="btn btn-danger btnp">Go ahead.</button><br></a>
            <a href="panel.php"><button type="button" class="btn btn-primary btnp">Go back to Panel</button></a><br>
        </div>
    </body>
</html>
