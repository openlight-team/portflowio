<?php
    session_start();
    include '../config.php';

    if ($_SESSION["loggedIn"] == true) {
        $login = 1;
    }
    else {
        header("Location: login.php");
    }

    $select_content = $database->query("SELECT * FROM " . $database_table . " WHERE id LIKE '" . $_GET['id'] . "'");
    while($selection = $select_content->fetch()) {
        $id = $selection['id'];
        $title = $selection['title'];
        $description = $selection['description'];
        $link = $selection['link'];
        $btnname = $selection['btnname'];
    }

    $bdd = $database;

    if(isset($_POST['validate'])) {
        $edit = $bdd->prepare("UPDATE " . $database_table . " SET title = ? WHERE id = ?");
        $edit->execute(array($_POST['title'], $id));
        $edit2 = $bdd->prepare("UPDATE " . $database_table . " SET description = ? WHERE id = ?");
        $edit2->execute(array($_POST['description'], $id));
        $edit3 = $bdd->prepare("UPDATE " . $database_table . " SET link = ? WHERE id = ?");
        $edit3->execute(array($_POST['link'], $id));
        $edit4 = $bdd->prepare("UPDATE " . $database_table . " SET btnname = ? WHERE id = ?");
        $edit4->execute(array($_POST['btnname'], $id));
        $message = "Card has been sucessfully edited.";
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
            <h2>Edit the "<?php echo $title; ?>" card.</h2>
            <p>Adding more content, ya know.</p>
            <a href="manage.php">Go back</a>
            <br><br>
            <form method="POST" action="">
                <input class="form-control" name="title" type="text" value="<?php echo $title; ?>" placeholder="Card title">
                <input class="form-control" name="description" type="text" value="<?php echo $description; ?>" placeholder="Card description">
                <input class="form-control" name="link" type="text" value="<?php echo $link; ?>" placeholder="Card link (don't forget http://)">
                <input class="form-control" name="btnname" type="text" value="<?php echo $btnname; ?>" placeholder="Button name">
                <input name="validate" type="submit" value="Edit" class="btn btn-primary">
            </form>
        </div>
    </body>
</html>