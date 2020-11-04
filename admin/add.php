<?php
    session_start();
    include '../config.php';
    include '../lang/' . $website_language . '.php';

    if ($_SESSION["loggedIn"] == true) {
        $login = 1;
    }
    else {
        header("Location: login.php");
    }

    if(isset($_POST['validate'])) {
        $insert = $database->prepare("INSERT INTO " . $database_table . "(title, description, link, btnname) VALUES(?, ?, ?, ?)");
        $insert->execute(array($_POST['title'], $_POST['description'], $_POST['link'], $_POST['btnname']));
        $message = "Card has been sucessfully added.";
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
            <?php if(isset($message)) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $message; ?>
                </div>
            <?php } ?>
            <br>
            <h2><?php echo $lang_add_title; ?></h2>
            <p><?php echo $lang_add_description; ?></p>
            <a href="manage.php"><?php echo $lang_global_back; ?></a>
            <br><br>
            <form method="POST" action="">
                <input class="form-control" name="title" type="text" placeholder="<?php echo $lang_add_input_title; ?>">
                <input class="form-control" name="description" type="text" placeholder="<?php echo $lang_add_input_description; ?>">
                <input class="form-control" name="link" type="text" placeholder="<?php echo $lang_add_input_link; ?>">
                <input class="form-control" name="btnname" type="text" placeholder="<?php echo $lang_add_input_btnname; ?>">
                <input name="validate" type="submit" value="<?php echo $lang_add_input_add; ?>" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>