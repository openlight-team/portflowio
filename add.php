<?php
    session_start();
    include '../config.php';

    if(sha1($_SESSION["password"]) == $admin_password) {
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
            <h2>Add a card to your website</h2>
            <p>Adding more content, ya know.</p>
            <a href="panel.php">Go back</a>
            <br><br>
            <form method="POST" action="">
                <input class="form-control" name="title" type="text" placeholder="Card title">
                <input class="form-control" name="description" type="text" placeholder="Card description">
                <input class="form-control" name="link" type="text" placeholder="Card link (don't forget http://)">
                <input class="form-control" name="btnname" type="text" placeholder="Button name">
                <input name="validate" type="submit" value="Add" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>