<?php
    session_start();
    include '../config.php';
    include '../lang/' . $website_language . '.php';

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
            <h2><?php echo $lang_del_sure; ?></h2>
            <p><?php echo $lang_make_text; ?></p>
            <br>
            <a href="make.php"><button type="button" class="btn btn-danger btnp"><?php echo $lang_make_btn; ?></button><br></a>
            <a href="panel.php"><button type="button" class="btn btn-primary btnp"><?php echo $lang_del_back; ?></button></a><br>
        </div>
    </body>
</html>
